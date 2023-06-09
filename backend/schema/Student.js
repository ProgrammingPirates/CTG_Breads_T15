const mongoose = require('mongoose');
// import schema from mongoose to make new Schems
// import { Schema } from 'mongoose';
const Schema = mongoose.Schema;

const StudentSchema = new Schema({
    name: {
        type: String,
        required: true
    },
    dob: {
        type: Date,
        required: true
    },
    gender: {
        type: String,
        required: true
    },
    college: {
        type: String,
        required: true
    },
    email: {
        type: String,
        required: true
    },
    contact: {
        type: String,
        required: true
    },
    addictions: {
        type: Array,
        required: true
    },
    status: {
        type: String,
        required: true
    },
    password: {
        type: String,
        required: true
    }
});

module.exports = mongoose.model('student', StudentSchema);