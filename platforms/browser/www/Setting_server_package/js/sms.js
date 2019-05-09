var esendex = require('esendex')({
    username: 'leelam.hale@gmail.com',
    password: 'Team15SMS'
  });
  
  var messages = {
    accountreference: 'EX0284274',
    message: [{
      to: '07402832846',
      body: 'Your friend did not get home Safely, call the police Barbara.'
    },
    ]
    };
  
  esendex.messages.send(messages, function (err, response) {
    if (err) return console.log('error: ', err);
    console.log(response);
  });