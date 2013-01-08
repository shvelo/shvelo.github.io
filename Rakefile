require "haml"
require "sass"
require "rainbow"

desc "Compile site"
task "default" => ["html", "css"]

task "Compile Haml to Html"
task "html" do |t|
	puts "Compiling Haml to Html".color(:green).bright
	template = File.read "index.haml"
	engine = Haml::Engine.new template
	require "./haml_helpers.rb"
	File.open("index.html", 'w') do |f|
		f.write engine.render
	end
end

desc "Compile Sass to Css"
task "css" do |t|
	puts "Compilling Sass to Css".color(:green).bright
	system "compass compile"
end

task "watch" => ["html"] do |t|
	puts "Watching Sass code for changes".color(:green).bright
	system "compass watch"
end

# Only for me
desc "Desploy site"
task "deploy" do |t|
	puts "Comitting changes".color(:green).bright
	system "git add ."
	system "git commit -a -m 'Update'"

	remotes = `git remote`.split
	remotes.each do |remote|
		puts "Pushing to #{remote}".color(:green).bright
		system "git push --all #{remote}"
	end
end