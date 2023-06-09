const mongoose = require('mongoose');
// import schema from mongoose to make new Schems
// import { Schema } from 'mongoose';
const Schema = mongoose.Schema;

const CounsellorSchema = new Schema({
    name: {
        type: String,
        required: true
    },
    email: {
        type: String,
        required: true
    },
    type: {
        type: String,
        required: true
    },
    // availability: {
    //     type: Array,
    //     required: true
    // },
    password: {
        type: String,
        required: true
}
});

module.exports = mongoose.model('counsellor', CounsellorSchema);