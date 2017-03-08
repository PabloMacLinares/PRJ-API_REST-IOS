//
//  DataReceiver.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 11/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import Foundation

protocol DataReceiver{
	
	func onDataReceived(data: [AnyObject])
	
	func onMessageReceived(message: String, retry: Bool)
	
}
