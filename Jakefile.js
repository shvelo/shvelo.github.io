var exec = require('child_process').exec;

var JQUERY_VERSION = "1.8.1";

desc('Build the project.');
task('default', ['css','js']);

desc('Generate CSS from LESS.');
task('css', [], function(params) {
    exec('lessc less/style.less css/style.css');
});

desc('Concatenate JS');
task('js', [], function(params) {
    exec('cat js/jquery-'+JQUERY_VERSION+'.min.js >js/all.js');
	exec('cat js/jquery.scrollTo.js >>js/all.js');
	exec('cat js/jquery.localscroll.js >>js/all.js');
	exec('cat js/custom.js >>js/all.js');
	exec('cat js/analytics.js >>js/all.js');
});

desc('Remove generated files');
task('clean', [], function(params) {
    exec('rm css/style.css');
    exec('rm js/all.js');
});
