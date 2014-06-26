require "rainbow"
require "webrick"

desc "Compile site"
task "default" => ["html", "css"]

task "Compile Slim to Html"
task "html" do |t|
	puts Rainbow("Compiling Slim to Html").color(:green).bright
	system "bundle exec slimrb -l -p index.slim index.html"
end

desc "Compile Sass to Css"
task "css" do |t|
	puts Rainbow("Compilling Sass to Css").color(:green).bright
	system "compass compile"
end

task "watch" => ["html", "css"] do |t|
	puts Rainbow("Watching Sass & Slim code for changes").color(:green).bright
	exec "bundle exec guard -i"
end

def start_server port = 9009
	include WEBrick
	puts "Starting server: http://localhost:#{port}"
	server = HTTPServer.new(:Port=>port, :DocumentRoot=>File.dirname(__FILE__) )
	trap("INT"){ server.shutdown }
	server.start
end

task "server" do |t|
	start_server
end