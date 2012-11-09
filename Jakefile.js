var exec = require('child_process').exec;
var fs = require('fs');
var less = require('less');

desc('Build the project.');
task('default', ['css','js']);

desc('Generate CSS from LESS.');
task('css', [], function(params) {
  try {
    console.log('Compiling CSS');
	
    var style_less = fs.readFileSync('less/style.less','utf8');
    less.render(style_less, function (e, css) {
	  fs.writeFile('css/style.css', css, function (err) {
	    if (err) throw err;
        console.log('CSS compiled');
      });
    });
	
  } catch(e) {
	console.error(e.message);
  }
});

desc('Concatenate JS');
task('js', ['update-jquery'], function(params) {
  try {
    console.log('Compiling scripts');
	
    var scripts = [];
    scripts[0] = fs.readFileSync('js/jquery.js');
    scripts[1] = fs.readFileSync('js/custom.js');
    scripts[2] = fs.readFileSync('js/analytics.js');
	
	fs.writeFile('js/all.js', scripts.join("\n\n"), function (err) {
	  if (err) throw err;
      console.log('Scripts compiled');
    });
	
  } catch(e) {
	console.error(e.message);
  }
});

desc('Update jQuery');
task('update-jquery', [], function(params) {
  console.log('Updating jQuery');
  exec('wget http://code.jquery.com/jquery-latest.min.js -O js/jquery.js');
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
