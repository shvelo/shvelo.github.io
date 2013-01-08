require "haml"
require "sass"

desc "Compile site"
task "default" => ["html", "css"]

task "Compile Haml to Html"
task "html" do |t|
	template = File.read "index.haml"
	engine = Haml::Engine.new(template)
	File.open("index.html", 'w') do |f|
		f.write engine.render
	end
end

desc "Compile Sass to Css"
task "css" do |t|
	template = File.read "sass/style.sass"
	engine = Sass::Engine.new(template)
	File.open("css/style.css", 'w') do |f|
		f.write engine.render
	end
end

# Only for me
desc "Desploy site"
task "deploy" do |t|
	system "git add ."
	system "git commit -a -m 'Update'"
	system "git push --all origin"
	system "git push --all github"
end