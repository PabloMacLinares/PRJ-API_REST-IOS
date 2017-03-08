//
//  RequestReceiver.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 7/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import Foundation

protocol RequestReceiver{
	
	func onRequestReceived(data: Data)
	
	func onErrorReceived(message: String)
	
}
