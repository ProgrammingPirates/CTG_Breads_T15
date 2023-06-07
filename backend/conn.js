const mongoose = require('mongoose');
const mongoURI = "mongodb://localhost:27017/BREADS";
const PORT = 5000

const connectToMongo = () => {
    mongoose.connect(mongoURI)
    console.log("connected to database");
}

module.exports = connectToMongo;