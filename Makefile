JQUERY_VERSION := 1.8.1

project : script style
script :
	cat js/jquery-$(JQUERY_VERSION).min.js >js/all.js
	cat js/jquery.scrollTo.js >>js/all.js
	cat js/jquery.localscroll.js >>js/all.js
	cat js/custom.js >>js/all.js
	cat js/analytics.js >>js/all.js
style :
	lessc less/style.less css/style.css
clean :
	rm js/all.js
	rm css/style.css
.PHONY : clean
