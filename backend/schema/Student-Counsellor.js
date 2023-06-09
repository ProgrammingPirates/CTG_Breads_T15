const mongoose = require('mongoose');
// import schema from mongoose to make new Schema
// import { Schema } from 'mongoose';
const Schema = mongoose.Schema;

const StudentCounsellorSchema = new Schema({
    studentid: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "students", // used like foreign key that refers to user schema that have been exported
    },
    counsellorid: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "counsellors", // used like foreign key that refers to user schema that have been exported
        required: true
    },
    date: {
        type: Date,
        required: true
    },
    start: {
        type: Number,
        required: true
    },
    end: {
        type: Number,
        required: true
    }
});


module.exports = mongoose.model('student-counsellor', StudentCounsellorSchema);

// StudentCounsellorSchema.index({ studentid: 1, counsellorid: 1 }, { unique: true })
