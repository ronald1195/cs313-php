const express = require('express')
const path = require('path')
const PORT = process.env.PORT || 5000

express()
  .use(express.static(path.join(__dirname, 'public')))
  .set('views', path.join(__dirname, 'views'))
  .set('view engine', 'ejs')
  .get('/', (req, res) => res.render('pages/form'))
  .get('/getRate', function (req, res) {

      var v1 = req.query.weight;
      var basePrice = 0;
      var answer = "Invalid entry";

      if (req.query.mailType == 'letters-stamped') {
          basePrice = 0.50;
          answer = "Your selected mail was: 'Letters (Stamped)' \n" +
                   "You specified that the wight of your package is:  " + v1 + "oz\n" +
                   "The price of mailing your package is: $" + (basePrice + (0.21 * (v1-1)));
      }

      if (req.query.mailType == 'letters-metered'){
          basePrice = 0.47;
          answer = "Your selected mail was: 'Letters (Metered)' \n" +
                   "You specified that the wight of your package is:  " + v1 + "oz\n" +
                   "The price of mailing your package is: $" + (basePrice + (0.21 * (v1-1)));
      }

      if (req.query.mailType == 'large-envelopes'){
          basePrice = 1.0;
          answer = "Your selected mail was: 'Letters (Metered)' \n" +
              "You specified that the wight of your package is:  " + v1 + "oz\n" +
              "The price of mailing your package is: $" + (basePrice + (0.21 * (v1-1)));
      }

      if (req.query.mailType == 'first-class'){

          if(v1 >= 5){
              basePrice = 3.5;
          }
          else if(v1 < 9 && v1 > 5){
            basePrice = 3.75
          }
          else if(v1 = 9){
            basePrice = 4.1
          }
          else if(v1 = 10){
            basePrice = 4.45
          }
          else if(v1 = 11){
            basePrice = 4.8
          }
          else if(v1 = 12){
            basePrice = 5.15
          }
          else if(v1 = 13){
            basePrice = 5.50
          }
          answer = "Your selected mail was: 'Letters (Metered)' \n" +
              "You specified that the wight of your package is:  " + v1 + "oz\n" +
              "The price of mailing your package is: $" + (basePrice);
      }
      res.write(`${answer}`)
      res.end()

  })
  .listen(PORT, () => console.log(`Listening on ${ PORT }`))
