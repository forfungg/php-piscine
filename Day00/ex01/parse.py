import json

with open('data.json', 'r') as f:
	data = json.load(f)

# <div class="elem">
# 					<div class="symbol">Cu</div>
# 					<div class="atom">29</div>
# 					<div class="weight">63.546</div>
# 				</div>

with open('parsed.html','w') as o:
	for d in data:
		o.write("<div class=\"cell\">\n")
		o.write("\t<div class=\"elem\">\n")
		o.write(f"\t\t<div class=\"symbol\">{d['symbol']}</div>\n")
		o.write(f"\t\t<div class=\"atom\">{d['atomicNumber']}</div>\n")
		if isinstance(d['atomicMass'], str):
			mass = d['atomicMass'].split('(')
		else:
			mass = d['atomicMass']
		o.write(f"\t\t<div class=\"weight\">{mass[0]}</div>\n")
		o.write("\t</div>\n")
		o.write("</div>\n")
