// JSON Web Token to generate unique Token for user
const jwt = require('jsonwebtoken');
// Signature Key
const AUTH_KEY = "ThisISforBREADS";

// middleware fxn(request, response, callbackfxn)
const fetchcounsellor = (req, res, next) => {
    // Get the authenticated token from the header having key: auth-token
    const authToken = req.header('auth-token');
    if (!authToken) {
        res.status(401).json({ error: "Not valid Token" });
    }

    // Fetch data after verifying the token received from the user and fetch the data(body) from token
    try {
        const data = jwt.verify(authToken, AUTH_KEY);
        req.counsellor = data.counsellor;
        next();
    } catch (error) {
        res.status(401).json({ error: "Not valid Token" });
    }
}

module.exports = fetchcounsellor;