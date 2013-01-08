require "haml"
require "sass"

task "default" => ["html", "css"]

task "html" do |t|
	template = File.read "index.haml"
	engine = Haml::Engine.new(template)
	File.write "index.html", engine.render
end

task "css" do |t|
	template = File.read "sass/style.sass"
	engine = Sass::Engine.new(template)
	File.write "css/style.css", engine.render
end

task "deploy" do |t|
	system "git add ."
	system "git commit -a -m 'Update'"
	system "git push --all origin"
	system "git push --all github"
end