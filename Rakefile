require "haml"
require "sass"
require "rainbow"
require "webrick"

desc "Compile site"
task "default" => ["html", "css"]

task "Compile Slim to Html"
task "html" do |t|
	puts "Compiling Slim to Html".color(:green).bright
	system "bundle exec slimrb -p index.slim index.html"
end

desc "Compile Sass to Css"
task "css" do |t|
	puts "Compilling Sass to Css".color(:green).bright
	system "compass compile"
end

task "watch" => ["html", "css"] do |t|
	puts "Watching Sass & Slim code for changes".color(:green).bright
	exec "bundle exec guard"
end

task "server" do |t|
	include WEBrick
	puts "Starting server: http://localhost:3000"
	server = HTTPServer.new(:Port=>3000,:DocumentRoot=>Dir::pwd )
	trap("INT"){ server.shutdown }
	server.start
end

# Only for me
desc "Desploy site"
task "deploy", [:message] do |t, args|
	puts "Comitting changes".color(:green).bright

	if args.message
		message = args.message
	else
		message = "Update"
	end

	system "git add ."
	system "git commit -a -m '#{message}'"

	remotes = `git remote`.split
	remotes.each do |remote|
		puts "Pushing to #{remote}".color(:green).bright
		system "git push --all #{remote}"
	end
end