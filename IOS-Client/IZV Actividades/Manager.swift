//
//  Manager.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 6/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import Foundation

protocol Manager{
	
	func selectAll(receiver: DataReceiver)
	
	func selectById(id: Int, receiver: DataReceiver)
}
