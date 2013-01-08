def if_ie
	surround '<!--[if lt IE9]>', '<![endif]-->'  do
		yield
	end
end

def meta_charset charset
	"<meta charset='#{charset}'>"
end

def meta_description description
	"<meta name='description' content='#{description}'>"
end


def meta_viewport viewport = "width=device-width,initial-scale=1"
	"<meta name='viewport' content='#{viewport}'>"
end

def favicon href
	"<link rel='shortcut icon' href='#{href}'>"
end

def stylesheet href
	"<link rel='stylesheet' href='#{href}'>"
end