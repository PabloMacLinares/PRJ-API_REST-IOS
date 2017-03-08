//
//  ManagerActividad.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 11/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import Foundation

class ManagerActividad: Manager, RequestReceiver{
	
	let BASE_URL = "actividad"
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
	
	func insertActividad(actividad: Actividad, receiver: DataReceiver){
		self.dataReceiver = receiver
		let url = client.BASE_URL + "/" + BASE_URL
		client.connectToServer(urlStr: url, method: client.METHOD_POST, data: actividad.getDictionary(), receiver: self)
	}
	
	func updateActividad(actividad: Actividad, receiver: DataReceiver){
		self.dataReceiver = receiver
		let url = "\(client.BASE_URL)/\(BASE_URL)/id/\(actividad.id)"
		client.connectToServer(urlStr: url, method: client.METHOD_PUT, data: actividad.getDictionary(), receiver: self)
	}
	
	func deleteActividad(actividad: Actividad, receiver: DataReceiver){
		self.dataReceiver = receiver
		let url = "\(client.BASE_URL)/\(BASE_URL)/id/\(actividad.id)"
		client.connectToServer(urlStr: url, method: client.METHOD_DELETE, receiver: self)
	}
	
	func onRequestReceived(data: Data){
		var actividades:[Actividad] = []

		let string1 = String(data: data, encoding: String.Encoding.utf8) ?? "Data could not be printed"
		print("-------------------------------------------------")
		//print(string1)
		print("-------------------------------------------------")
		if(string1.contains("No application seems to be running here!")){
			dataReceiver?.onMessageReceived(message: "No se puede conectar con el servidor", retry: true)
			return
		}else if(string1.contains("message") && string1.contains("ok")){
			dataReceiver?.onMessageReceived(message: "ok", retry: false)
			return
		}else if(string1.contains("message") && string1.contains("error")){
			dataReceiver?.onMessageReceived(message: "Error procesando los datos", retry: false)
			return
		}
		
		guard let dictionary = Utils.parseJson(data: data) else{
			print("can´t parse")
			dataReceiver?.onMessageReceived(message: "No se pueden leer los datos recibidos", retry: true)
			return
		}
		
		guard let dictActividades = dictionary["Actividad"] as? [[String: Any]] else{
			print("can't parse actividad")
			dataReceiver?.onMessageReceived(message: "Los datos recibidos están corruptos", retry: true)
			return
		}
		
		
		for dictActividad in dictActividades{
			let a = Actividad(dictionary: dictActividad)
			actividades.append(a)
			//print(a)
		}
		dataReceiver?.onDataReceived(data: actividades)
	}
	
	func onErrorReceived(message: String) {
		print(message)
		dataReceiver?.onMessageReceived(message: message, retry: false)
	}
}
