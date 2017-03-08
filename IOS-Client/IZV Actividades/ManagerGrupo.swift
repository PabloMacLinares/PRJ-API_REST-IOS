//
//  ManagerGrupo.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 6/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import Foundation

class ManagerGrupo: Manager, RequestReceiver{
	
	let BASE_URL = "grupo"
	let client = Client()
	var dataReceiver: DataReceiver?
	
	func selectAll(receiver: DataReceiver){
		self.dataReceiver = receiver
		let url = client.BASE_URL + "/" + BASE_URL
		client.connectToServer(urlStr: url, method: client.METHOD_GET, receiver: self)
	}
	
	func selectById(id: Int, receiver: DataReceiver){
		self.dataReceiver = receiver
		let url = "\(client.BASE_URL)/\(BASE_URL)/id/\(id)"
		client.connectToServer(urlStr: url, method: client.METHOD_GET, receiver: self)
	}
	
	func onRequestReceived(data: Data){
		var grupos:[Grupo] = []
		
		guard let dictionary = Utils.parseJson(data: data) else{
			print("can´t parse")
			return
		}
		
		guard let dictGrupos = dictionary["Grupo"] as? [[String: Any]] else{
			print("can't parse grupo")
			return
		}
		
		
		for dictGrupo in dictGrupos{
			let g = Grupo(dictionary: dictGrupo)
			grupos.append(g)
			//print(g)
		}
		dataReceiver?.onDataReceived(data: grupos)
	}
	
	func onErrorReceived(message: String) {
		print(message)
	}
}
