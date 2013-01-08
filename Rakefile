require "haml"
require "sass"

desc "Compile site"
task "default" => ["html", "css"]

task "Compile Haml to Html"
task "html" do |t|
	puts "Compiling Haml to Html"
	template = File.read "index.haml"
	engine = Haml::Engine.new template
	require "./haml_helpers.rb"
	File.open("index.html", 'w') do |f|
		f.write engine.render
	end
end

desc "Compile Sass to Css"
task "css" do |t|
	puts "Compilling Sass to Css"
	system "compass compile"
end

task "watch" => ["html"] do |t|
	puts "Watching Sass code for changes"
	system "compass watch"
end

# Only for me
desc "Desploy site"
task "deploy" do |t|
	puts "Comitting changes"
	system "git add ."
	system "git commit -a -m 'Update'"
	puts "Pushing to origin"
	system "git push --all origin"
	puts "Pushing to GitHub"
	system "git push --all github"
end