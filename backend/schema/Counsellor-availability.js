const mongoose = require('mongoose');
// import schema from mongoose to make new Schems
// import { Schema } from 'mongoose';
const Schema = mongoose.Schema;

const CounsellorAvailability = new Schema({
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

module.exports = mongoose.model('counsellor-availability', CounsellorAvailability);