const mongoose = require('mongoose');
// import schema from mongoose to make new Schems
// import { Schema } from 'mongoose';
const Schema = mongoose.Schema;

const ProgressSchema = new Schema({
    studentid: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "students", // used like foreign key that refers to user schema that have been exported
    }, 
    counsellorid: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "counsellors", // used like foreign key that refers to user schema that have been exported
        required: true
    },
    rating: {
        type: Number,
        required: true
    },
    notes: {
        type: String
    }
})

ProgressSchema.index({ studentid: 1, counsellorid: 1 }, { unique: true })

module.exports = mongoose.model('progress', ProgressSchema);