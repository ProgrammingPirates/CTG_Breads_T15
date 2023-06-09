const express = require('express')
const router = express.Router()

// bcryptjs package for password hashing and encryption
const bcrypt = require('bcryptjs')

// import validators
const { body, validationResult } = require('express-validator')

// JSON Web Token to generate unique Token for user
const jwt = require('jsonwebtoken');
const Student = require('../schema/Student')

const fetchstudent = require('../middleware/fetchstudent');
const StudentCounsellor = require('../schema/Student-Counsellor');

// Signature Key
const AUTH_KEY = "ThisISforBREADS";

// route for adding new student
router.post('/add-student', 
    [body("name", "Valid name should be of length more than 4").isLength({ min: 5 }),
    body("dob", "Not correct date").isDate(),
    body("gender", "should be either of the above").isLength({ min: 4 }),
    body("college", "not valid college name").isLength({ min: 5 }),
    body("email", "Not valid Email").isEmail(),
    body("contact", "not valid contact").isNumeric({ min:10, max:10 }),
    body("addictions", "adddictions should be of type array").isArray(),
    body("status", "status should be either married or unmarried").isLength({ min:7, max: 9 }),
    body("password","password should be of min length 8 and one uppercase, one lowercase and one special symbol").isStrongPassword({
        minLength: 8,
        minLowercase: 1,
        minUppercase: 1,
        minNumbers: 1,
        minSymbols: 1,
        returnScore: false,
        pointsPerUnique: 1,
        pointsPerRepeat: 0.5,
        pointsForContainingLower: 10,
        pointsForContainingUpper: 10,
        pointsForContainingNumber: 10,
        pointsForContainingSymbol: 10,
        })
    ],
    async (req, res) => {
        let success = false;
        // res.json({name:"Rahul Maurya", age: 21});

        // check for errors in input
        const errors = validationResult(req);
        if (!errors.isEmpty()) {
            return res.status(400).json({ success, errors: errors.array() });
        }

        try {
            const { name, dob, gender, college, email, contact, addictions, status, password } = req.body

            let student = await Student.findOne({ email });
            if (student) {
                return res.status(400).json({ success, error: "Email already Registered" });
            }

            // Encrypting the password
            const salt = await bcrypt.genSalt(10);
            const secPassword = await bcrypt.hash(password, salt);
            // console.log(secPassword);

            student = await Student.create({
                name,
                dob,
                gender,
                college,
                email,
                contact,
                addictions,
                status,
                password: secPassword
            })

            // Generating new Token
            // Retrieving the unique id from database which is generated automatically by mongoDB
            const data = {
                student: {
                    id: student.id,
                }
            }

            // After successful registration authToken is generated and sended to user
            const authToken = jwt.sign(data, AUTH_KEY);
            // console.log(authToken);

            success = true;
            res.json({ success, authToken });
        } catch (err) {
            console.error(err.message);
            res.status(500).json({ success, error: "Internal Server Error" });
        }
        
})


// route for login of student
router.post("/student-login",
    [
        body("email", "Not valid email").isEmail(),
        body("password", "Password Required").exists()
    ],
    async (req, res) => {
        let success = false;

        // check for errors in input
        const errors = validationResult(req);
        if (!errors.isEmpty()) {
            return res.status(400).json({ success, errors: errors.array() });
        }

        try {
            const { email, password } = req.body;
            //  Check if email is already exists or not
            let student = await Student.findOne({ email });
            if (!student) {
                return res.status(400).json({ success, error: "Please Login using correct Credentials" });
            }

            const passwordMatch = await bcrypt.compare(password, student.password);
            if (!passwordMatch) {
                return res.status(400).json({ success, error: "Please Login using correct Credentials" });
            }

            // If Login Successful Generate new Token
            // Retrieving the unique id from database which is generated automatically by mongoDB
            const data = {
                student: {
                    id: student.id,
                }
            }

            // After successful login authToken is generated and sended to user
            const authToken = jwt.sign(data, AUTH_KEY);
            // console.log(authToken);

            success = true;
            res.json({ success, authToken });

            // Need to send response else the client would keep on waiting. Not needed when authToken is being sended
            // res.json(student);

            // Catch Error if bad requests occured
        } catch (err) {
            console.error(err.message);
            res.status(500).send("Internal Server Error");
        }

    })


// route for getting the details of student using the student auth token
router.get('/checkstudent', fetchstudent,
    async (req, res) => {
        try {
            const studentId = req.student.id;
            const student = await Student.findById(studentId).select("-password");
            res.send(student);
        } catch (err) {
            console.error(err.message);
            res.status(500).send("Internal Server Error");
        }
    });


// route to assign the counsellor to the student
router.post('/assign-counsellor', fetchstudent, 
    async (req, res) => {
        try {
            const studentid = req.student.id
            const { counsellorid, date, start, end } = req.body

            const student_counsellor = await StudentCounsellor.create({
                studentid,
                counsellorid,
                date,
                start,
                end
            })

            const success = true;
            res.json({ success, msg: "counsellor and slot assigned to student", student_counsellor });
        } catch (err) {
            console.error(err.message);
            res.status(500).send("Internal Server Error");
        }
    })


router.get('/student-information', fetchstudent, 
    async(req, res) => {
        try {
            const studentid = req.student.id

            let student = await Student.aggregate([{
                $lookup: {
                    from: "progresses",
                    localField: "_id",
                    foreignField: "studentid",
                    as: "progress"
                }
            }])
            
            student = student.filter(s => {
                return s._id.toString()===studentid
            })

            const success = true
            res.json({ success, student })
        } catch (err) {
            console.error(err.message);
            res.status(500).json({ msg: "Internal Server Error" });
        }
    }
)

// Export the module
module.exports = router;