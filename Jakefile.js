var exec = require('child_process').exec;

desc('Build the project.');
task('default', ['css','js']);

desc('Generate CSS from LESS.');
task('css', [], function(params) {
    exec('lessc less/style.less css/style.css');
});

desc('Concatenate JS');
task('js', ['update-jquery'], function(params) {
  exec('cat js/jquery-latest.min.js >js/all.js');
  exec('echo "\n" >>js/all.js');
	exec('cat js/custom.js >>js/all.js');
	exec('echo "\n" >>js/all.js');
	exec('cat js/analytics.js >>js/all.js');
});

desc('Update jQuery');
task('update-jquery', [], function(params) {
    exec('wget http://code.jquery.com/jquery-latest.min.js -O js/jquery-latest.min.js');
});

desc('Remove generated files');
task('clobber', [], function(params) {
    exec('rm css/style.css');
    exec('rm js/all.js');
});
