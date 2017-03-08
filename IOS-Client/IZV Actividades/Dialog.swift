//
//  Dialog.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 16/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import UIKit

class Dialog{
	
	public static func createAlert(title: String, message: String, btText: String?, btAction: (() -> Void)?) -> UIAlertController{
		let alert = UIAlertController(title: title, message: message, preferredStyle: UIAlertControllerStyle.alert)
		alert.addAction(UIAlertAction(title: btText ?? "OK", style: UIAlertActionStyle.default, handler: {(action: UIAlertAction!) in btAction!()}))
		
		return alert
	}
	
}
