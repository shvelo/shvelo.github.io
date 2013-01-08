require "haml"
require "sass"

desc "Compile site"
task "default" => ["html", "css"]

task "Compile Haml to Html"
task "html" do |t|
	template = File.read "index.haml"
	engine = Haml::Engine.new template
	require "./haml_helpers.rb"
	File.open("index.html", 'w') do |f|
		f.write engine.render
	end
end

desc "Compile Sass to Css"
task "css" do |t|
	system "compass compile"
end

task "watch" => ["html"] do |t|
	system "compass watch"
end

# Only for me
desc "Desploy site"
task "deploy" do |t|
	system "git add ."
	system "git commit -a -m 'Update'"
	system "git push --all origin"
	system "git push --all github"
end