const express = require('express')
const router = express.Router()

const Counsellor = require('../schema/Counsellor')
const Student = require('../schema/Student')
const fetchcounsellor = require('../middleware/fetchcounsellor')
const StudentCounsellor = require('../schema/Student-Counsellor');


// bcryptjs package for password hashing and encryption
const bcrypt = require('bcryptjs');

// import validators
const { body, validationResult } = require('express-validator');

// JSON Web Token to generate unique Token for user
const jwt = require('jsonwebtoken');
// Signature Key
const AUTH_KEY = "ThisISforBREADS";

// route to add new councellor
router.post('/add-counsellor',
    [body("name", "Valid name should be of length more than 4").isLength({ min: 5 }),
    body("email", "Not valid Email").isEmail(),
    body("type", "Type must be of valid length").isLength({ min: 5 }),
    body("availability", "not valid array of availabile days").isArray(),
    body("yearsOfExperience", "Years of experience must be less than 70").isNumeric().custom((value) => {
        if (value > 70) {
          throw new Error("Years of experience must be less than 70,else you're not allowed");
        }
        return true;
      }),
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

        //check for errors in input
        const errors = validationResult(req);
        if (!errors.isEmpty()) {
            return res.status(400).json({ success, errors: errors.array() });
        }

        try {
            const { name, type, availability, email, yearsOfExperience, password } = req.body

            let counsellor = await Counsellor.findOne({ email: email });
            if (counsellor) {
                return res.status(400).json({ success, error: "Email already Registered" });
            }

            // Encrypting the password
            const salt = await bcrypt.genSalt(10);
            const secPassword = await bcrypt.hash(password, salt);
            // console.log(secPassword);

            counsellor = await Counsellor.create({
                name,
                email,
                type,
                availability,
                yearsOfExperience,
                password: secPassword
            })

            // Generating new Token
            // Retrieving the unique id from database which is generated automatically by mongoDB
            const data = {
                counsellor: {
                    id: counsellor.id,
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


// route for login of councellor
router.post("/counsellor-login",
    [
        body("email", "Not valid email").isEmail(),
        body("password", "Password Required").exists()
    ],
    async(req, res) => {
        let success = false;

        // console.log(req.body);
        // check for errors in input
        const errors = validationResult(req);
        if (!errors.isEmpty()) {
            return res.status(400).json({ success, errors: errors.array() });
        }

        try {
            const { email, password } = req.body;
            //  Check if email is already exists or not
            let counsellor = await Counsellor.findOne({ email });
            if (!counsellor) {
                return res.status(400).json({ success, error: "Please Login using correct Credentials" });
            }

            const passwordMatch = await bcrypt.compare(password, counsellor.password);
            if (!passwordMatch) {
                return res.status(400).json({ success, error: "Please Login using correct Credentials" });
            }

            // If Login Successful Generate new Token
            // Retrieving the unique id from database which is generated automatically by mongoDB
            const data = {
                counsellor: {
                    id: counsellor.id,
                }
            }

            // After successful login authToken is generated and sended to user
            const authToken = jwt.sign(data, AUTH_KEY);
            // console.log(authToken);

            success = true;
            res.json({ success, authToken });

            // Need to send response else the client would keep on waiting. Not needed when authToken is being sended
            // res.json(counsellor);

            // Catch Error if bad requests occured
        } catch (err) {
            console.error(err.message);
            res.status(500).send("Internal Server Error");
        }

})


// route for getting the details of councellor using the councellor auth token
router.get('/checkcounsellor', fetchcounsellor,
    async (req, res) => {
        try {
            const counsellorId = req.counsellor.id;
            const counsellor = await Counsellor.findById(counsellorId).select("-password");
            res.send(counsellor);
        } catch (err) {
            console.error(err.message);
            res.status(500).send("Internal Server Error");
        }
    });


// fetch all the counsellor in the database
router.get('/all-counsellor', async (req, res) => {
    try {
        const counsellors = await Counsellor.find().select('-password')

        res.send(counsellors)
    } catch (err) {
        console.error(err.message);
        res.status(500).send("Internal Server Error");
    }
})


// fetch all the students in the database
router.get('/all-students', fetchcounsellor, 
    async(req, res) => {
        try {
            const counsellorid = req.counsellor.id

            let students = await StudentCounsellor.find({ counsellorid })
            
            for(let i=0;i<students.length;i++) {
                students[i] = await Student.find({ _id: students[i].studentid }).select('-password')
            }

            res.send(students)
        } catch(err) {
            console.error(err.message);
            res.status(500).send("Internal Server Error");
        }
})

// Export the module
module.exports = router;