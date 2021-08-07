
import mx.events.EventDispatcher;


class XMLManager extends Object
{
	//EventDispatcher needs these
	var addEventListener:Function;
	var removeEventListener:Function;
	var dispatchEvent:Function;
	var dispatchQueue:Function;

	//Private vars
	public var m_xml:XML;

	function XMLManager(Void)
	{
		EventDispatcher.initialize(this);
	}

	function load(p_file:String):Void {
		
		m_xml = new XML();
		m_xml["mc"] = this;
		m_xml.ignoreWhite = true;
		m_xml.onData = function (src) {
			if (src == undefined) {
				this.mc.dispatchEvent({type:"error", src:src});
			} else {
				this.parseXML(src);
				this.loaded = true;
				this.onLoad(true);
			}
		}
		m_xml.onLoad = function() {
			if (this.firstChild.nodeName == "html") {
				this.mc.dispatchEvent({type:"onLoad", src:this});
			} else {
				this.mc.dispatchEvent({type:"onLoad", xml:this});
			}
		}
		m_xml.load(p_file);
		
	}

	
}
