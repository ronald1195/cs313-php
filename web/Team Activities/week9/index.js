const express = require('express')
const path = require('path')
const PORT = process.env.PORT || 5000

var app = express()

express()
  .use(express.static(path.join(__dirname, 'public')))
  .set('views', path.join(__dirname, 'views'))
  .set('view engine', 'ejs')
  .get('/', (req, res) => res.render('pages/form'))
  .get('/math', function (req, res) {

    var v1 = req.query.var1
    var v2 = req.query.var2
    var answer = "Invalid entry";

    if (req.query.operation == 'Add') {
      answer = parseInt(v1)  + parseInt(v2)
    }

    if (req.query.operation == 'Subtract'){
      answer = parseInt(v1) - parseInt(v2)
    }

    if (req.query.operation == 'Multiply'){
      answer = parseInt(v1) * parseInt(v2)
    }

    if (req.query.operation == 'Divide'){
      answer = parseInt(v1) / parseInt(v2)
    }

    res.write(`${answer}`)
    res.end()

  })
  .listen(PORT, () => console.log(`Listening on ${ PORT }`))
