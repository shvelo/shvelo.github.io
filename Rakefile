require "haml"
require "sass"
require "rainbow"

desc "Compile site"
task "default" => ["html", "css"]

task "Compile Haml to Html"
task "html" do |t|
	puts "Compiling Haml to Html".color(:green).bright
	system "haml index.haml index.html"
end

desc "Compile Sass to Css"
task "css" do |t|
	puts "Compilling Sass to Css".color(:green).bright
	system "compass compile"
end

task "watch" => ["html", "css"] do |t|
	puts "Watching Sass & Haml code for changes".color(:green).bright
	system "bundle exec guard -i"
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