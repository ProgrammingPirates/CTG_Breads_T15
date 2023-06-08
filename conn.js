const mongoose = require('mongoose');
const mongoURI = "mongodb+srv://breads:aryanrajput@cluster0.jhh38ig.mongodb.net/";
const PORT = 5000

const connectToMongo = () => {
    mongoose.connect(mongoURI)
    console.log("connected to database");
}

module.exports = connectToMongo;


//Direct atlas connection

// const { MongoClient } = require('mongodb');

// const uri = 'mongodb+srv://breads:aryanrajput@cluster0.jhh38ig.mongodb.net/?retryWrites=true&w=majority';
// const client = new MongoClient(uri, { useNewUrlParser: true, useUnifiedTopology: true });

// async function connectToMongo() {
//   try {
//     await client.connect();
//     console.log('Connected to MongoDB Atlas');
    
//     // Perform database operations
//   } catch (error) {
//     console.error('Error connecting to MongoDB Atlas', error);
//   }
// }

// module.exports = connectToMongo;
