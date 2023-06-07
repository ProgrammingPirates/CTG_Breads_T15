const express = require('express')
const cors = require('cors')
const app = express()

const connectToMongo = require('./conn')

app.use(cors())
const port = 5000
const bodyParser = require('body-parser')
app.use(bodyParser.urlencoded({ extended: true }))
app.use(bodyParser.json())

// Use this middleware as we are sending data in json format to the server
app.use(express.json())
connectToMongo()

app.use('/', require('./routes/counsellor'))
app.use('/', require('./routes/student'))

// app.get('/', (req, res) => {
//     res.end('server home page')
// })

app.listen(port, ()=>{
    console.log('app started on port 5000')
})