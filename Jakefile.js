var exec = require('child_process').exec;
var fs = require('fs');
var less = require('less');
var request = require('request');
var mu2 = require('mu2');

desc('Build the project.');
task('default', ['html','css','js']);

desc("Generate HTML");
task('html', [], function(params){
  try {
    console.log('Generating HTML');
    var jsondata = JSON.parse(fs.readFileSync('data.json','utf8'));
    fs.openSync('index.html', "w");
    mu2.compileAndRender('index.mustache', jsondata).on('data', function (data) {
      fs.appendFileSync('index.html', data);
    }).on('end', function() {
      console.log('HTML generated');
    });
  } catch(e) {
    console.error(e.message);
  }
});

desc('Generate CSS from LESS.');
task('css', [], function(params) {
  try {
    console.log('Compiling CSS');

    var style_less = fs.readFileSync('less/style.less','utf8');
    less.render(style_less, function (e, css) {
     fs.writeFileSync('css/style.css', css);
     console.log('CSS compiled');
   });

  } catch(e) {
    console.error(e.message);
  }
});

desc('Compile scripts');
task('js', [], function(params) {
  try {
    console.log('Compiling scripts');

    var scripts = [];
    scripts[0] = fs.readFileSync('js/jquery.js');
    scripts[1] = fs.readFileSync('js/custom.js');
    scripts[2] = fs.readFileSync('js/analytics.js');

    fs.writeFileSync('js/all.js', scripts.join("\n\n"));

    console.log('Scripts compiled');
  } catch(e) {
   console.error(e.message);
 }
});

desc('Update jQuery');
task('update-jquery', [], function(params) {
  console.log('Updating jQuery');
  request('http://code.jquery.com/jquery-latest.min.js', function (error, response, body) {
   if (!error && response.statusCode == 200) {
    fs.writeFileSync('js/jquery.js', body);
    console.log('jQuery updated');
  } else {
    console.log('Error updating jQuery');
  }
});
});

desc('Remove generated files');
task('clobber', [], function(params) {
  try {
    console.log('Removing style.css');
    fs.unlink('css/style.css');

    console.log('Removing all.js');
    fs.unlink('js/all.js');
  } catch(e) {
    console.error(e.message);
  }
});
