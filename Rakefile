require "haml"
require "sass"
require "rainbow"

desc "Compile site"
task "default" => ["html", "css"]

task "Compile Haml to Html"
task "html" do |t|
	puts "Compiling Haml to Html".color(:green).bright
	compile_html
end

def compile_html
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
	puts "Watching Sass & Haml code for changes".color(:green).bright
	Thread.new do 
		system "compass watch"
	end
	Thread.new do
		md5sum = `md5sum index.haml`
		while true
			md5sum_new = `md5sum index.haml`
			if md5sum != md5sum_new
				puts "Haml changed, compilling".color(:green).bright
				compile_html
			else
				sleep 0.5
			end
			md5sum = md5sum_new
		end
	end
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