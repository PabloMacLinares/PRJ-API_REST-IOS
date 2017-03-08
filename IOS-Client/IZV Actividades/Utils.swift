//
//  Utils.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 7/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import UIKit

class Utils{
	static func stringToDate(date: String) -> Date{
		let formatter = DateFormatter()
		formatter.dateFormat = "yyyy-MM-dd"
		formatter.locale = Locale.init(identifier: "es_ES")
		return formatter.date(from: date)!
	}
	
	static func stringToTime(time: String) -> Date{
		let formatter = DateFormatter()
		formatter.dateFormat = "HH:mm:ss"
		formatter.locale = Locale.init(identifier: "es_ES")
		return formatter.date(from: time)!
	}
	
	static func dateToString(date: Date) -> String{
		let formatter = DateFormatter()
		formatter.dateFormat = "dd/MM/yyyy"
		formatter.locale = Locale.init(identifier: "es_ES")
		return formatter.string(from: date)
	}
	
	static func dateForDictionary(date: Date) -> String{
		let formatter = DateFormatter()
		formatter.dateFormat = "yyyy-MM-dd"
		formatter.locale = Locale.init(identifier: "es_ES")
		return formatter.string(from: date)
	}
	
	static func timeToString(date: Date) -> String{
		let formatter = DateFormatter()
		formatter.dateFormat = "HH:mm"
		formatter.locale = Locale.init(identifier: "es_ES")
		return formatter.string(from: date)
	}
	
	static func timeForDictionary(date: Date) -> String{
		let formatter = DateFormatter()
		formatter.dateFormat = "HH:mm:ss"
		formatter.locale = Locale.init(identifier: "es_ES")
		return formatter.string(from: date)
	}
	
	static func parseDictionary(data: [String: Any]) -> Data?{
		guard let json = try? JSONSerialization.data(withJSONObject: data, options: []) else{
			print("error parsing dictionary")
			return nil
		}
		return json
	}
	
	static func parseJson(data: Data) -> [String: Any]?{
		guard let dictionary = try? JSONSerialization.jsonObject(with: data, options: []) as? [String: Any] else{
			print("error parsing json")
			return nil
		}
		return dictionary
	}
}
