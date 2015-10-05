require "rainbow"
require "webrick"

desc "Compile site"
task "default" => ["css"]

desc "Compile Sass to Css"
task "css" do |t|
	puts Rainbow("Compilling Sass to Css").color(:green).bright
	system "compass compile"
end

task "watch" => ["css"] do |t|
	puts Rainbow("Watching Sass code for changes").color(:green).bright
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
