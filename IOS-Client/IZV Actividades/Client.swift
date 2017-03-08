//
//  Client.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 6/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import Foundation

class Client{
	//MARK: Constants
	//let BASE_URL = "http://192.168.2.11:8181/prj-ios/api"
	let BASE_URL = "https://prj-ios-runepml.c9users.io/api"
	let METHOD_GET = "GET"
	let METHOD_POST = "POST"
	let METHOD_PUT = "PUT"
	let METHOD_DELETE = "DELETE"
	
	func connectToServer(urlStr: String, method: String, data: [String: Any] = [:], receiver: RequestReceiver){
	
		//Comprobamos que la URL generada sea correcta
	
		if let url = NSURL(string: urlStr){
			let request = NSMutableURLRequest(url: url as URL)
			
			request.httpMethod = method
			
			switch method{
				case METHOD_POST, METHOD_PUT:
					if let jsonData = try? JSONSerialization.data(withJSONObject: data, options: .prettyPrinted){
						request.addValue("application/json", forHTTPHeaderField: "Content-Type")
						request.httpBody = jsonData
					}
				default: break
			}
			//print (url)
			//Creamos la conexion
			let task = URLSession.shared.dataTask(with: request as URLRequest){
				(data, response, error) -> Void in
				
				guard error == nil else{
					receiver.onErrorReceived(message: "Error")
					return
				}
				
				guard let rData = data else{
					receiver.onErrorReceived(message: "Error Data")
					return
				}
				
				DispatchQueue.main.async {
					receiver.onRequestReceived(data: rData)
				}
				
			}
		
			task.resume()
			
		}
	}
}
