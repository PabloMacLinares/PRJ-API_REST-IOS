//
//  ViewController.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 3/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import UIKit

class ViewController: UIViewController, UITableViewDataSource, UITableViewDelegate, UISearchBarDelegate, DataReceiver {
	
	//MARK: variables
	let PROFESOR = 0
	let FECHA = 1
	let ma = ManagerActividad()
	var actividades = [Actividad]()
	var filteredActividades:[Actividad] = []
	var showSearchBar = false
	var selectedFilter = 0
	var searchActive = false
	var searchDateActive = false
	
	//MARK: UI variables
	@IBOutlet weak var actividadTableView: UITableView!
	@IBOutlet weak var aiProgress: UIActivityIndicatorView!
	@IBOutlet weak var sbFilter: UISegmentedControl!
	@IBOutlet weak var searchBar: UISearchBar!
	@IBOutlet weak var datePicker: UIDatePicker!
	@IBOutlet weak var lbCoincidencias: UILabel!
	
	
	//MARK: TableView Data Source Methods
	func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
		if(!searchActive && !searchDateActive){
			return actividades.count
		}else{
			return filteredActividades.count
		}
	}
	
	func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell {
		//let cell = UITableViewCell()
		let cell = tableView.dequeueReusableCell(withIdentifier: "ActivityCell") as UITableViewCell!
		
		var actividad = Actividad()
		
		if(!searchActive && !searchDateActive){
			actividad = actividades[indexPath.row]
		}else{
			if(indexPath.row >= filteredActividades.count){
				searchActive = false;
				searchDateActive = false;
				DispatchQueue.main.async {
					self.actividadTableView.reloadData()
				}
			}else{
				actividad = filteredActividades[indexPath.row]
			}
		}
		
		cell?.textLabel?.text = actividad.titulo
		var detailText: String = actividad.descripcion
		if(detailText.characters.count > 20){
			detailText = detailText.substring(to: detailText.index(detailText.startIndex, offsetBy: 20)) + "..."
		}
		cell?.detailTextLabel?.text = detailText + " - " + Utils.dateToString(date: actividad.fecha)
		
		cell?.imageView?.contentMode = .scaleToFill
		cell?.imageView?.image = actividad.imagen
		return cell!
	}
	
	func tableView(_ tableView: UITableView, didSelectRowAt indexPath: IndexPath) {
		/*print("Soy la fila seleccionada")
		selectedActividad = actividades[indexPath.row]
		self.performSegue(withIdentifier: "editActividadSegue", sender: nil)*/
	}
	
	//MARK: SearchBar Methods
	func searchBarTextDidBeginEditing(_ searchBar: UISearchBar) {
		searchActive = true
	}
	
	func searchBarTextDidEndEditing(_ searchBar: UISearchBar) {
		searchActive = false
	}
	
	func searchBarCancelButtonClicked(_ searchBar: UISearchBar) {
		searchActive = false
	}
	
	func searchBarSearchButtonClicked(_ searchBar: UISearchBar) {
		searchActive = false
	}
	
	func searchBar(_ searchBar: UISearchBar, textDidChange searchText: String) {
		//print(searchText)
		filteredActividades = []
		
		for actividad in actividades{
			if(actividad.profesor?.nombre.capitalized(with: Locale.init(identifier: "es_ES")).contains(searchText.capitalized(with: Locale.init(identifier: "es_ES"))))!{
				filteredActividades.append(actividad)
			}
		}
		lbCoincidenciasText(coincidencias: filteredActividades.count)
		//searchActive = !(filteredActividades.count == 0)
		actividadTableView.reloadData()
	}
	
	//MARK: View Controller Methods
	override func viewDidLoad() {
		super.viewDidLoad()
		
		searchBar.delegate = self
		
		aiProgress.isHidden = true
		aiProgress.layer.zPosition = 999999
		lbCoincidencias.isHidden = true
		lbCoincidencias.layer.zPosition = 999999
		sbFilter.isHidden = true
		searchBar.isHidden = true
		datePicker.isHidden = true
		getAll()
	}

	override func didReceiveMemoryWarning() {
		super.didReceiveMemoryWarning()
		// Dispose of any resources that can be recreated.
	}
	
	//MARK: Navigation
	override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
		if(segue.identifier == "editActividadSegue"){
			if let vc = segue.destination as? ViewControllerEditActividad{
				var actividad = Actividad()
				if(!searchActive && !searchDateActive){
					actividad = actividades[(actividadTableView.indexPathForSelectedRow?.row)!]
				}else{
					actividad = filteredActividades[(actividadTableView.indexPathForSelectedRow?.row)!]
				}
				//print("Sending \(actividad)")
				vc.actividad = actividad
			}
		}
		
		searchActive = false
		searchDateActive = false
	}
	
	@IBAction func unwindToViewController(sender: UIStoryboardSegue){
		searchActive = false
		searchDateActive = false
		showSearchBar = false
		sbFilter.isHidden = true
		filterSelection()
		
		/*if let sourceViewController = sender.source as? ViewControllerEditActividad, let actividad = sourceViewController.actividad{
			
			let newIndex = IndexPath(row: actividades.count, section: 0)
			actividades.append(actividad)
			print("Nueva actividad: \(actividad)")
			actividadTableView.insertRows(at: [newIndex], with: .automatic)
		}*/
		
		if(sender.source .isKind(of: ViewControllerEditActividad.self)){
			if(sender.identifier == "unwindSave"){
				let vc = sender.source as! ViewControllerEditActividad
				let actividad = vc.actividad
				if(actividad.id == -1){
					print("Inserting new actividad")
					let newIndex = IndexPath(row: actividades.count, section: 0)
					ma.insertActividad(actividad: actividad, receiver: self)
					actividades.append(actividad)
					actividadTableView.insertRows(at: [newIndex], with: .automatic)
					DispatchQueue.main.async {
						self.actividadTableView.reloadData()
					}
				}else{
					print("updating actividad with id: \(actividad.id)")
					for index in 0 ... actividades.count{
						if(actividad.id == actividades[index].id){
							ma.updateActividad(actividad: actividad, receiver: self)
							actividades[index] = actividad
							DispatchQueue.main.async {
								self.actividadTableView.reloadData()
							}
							break
						}
					}
				}
			}else if(sender.identifier == "unwindDelete"){
				let vc = sender.source as! ViewControllerEditActividad
				let actividad = vc.actividad
				if(actividad.id != -1){
					print("deleting actividad with id: \(actividad.id)")
					for index in 0 ... actividades.count{
						if(actividad.id == actividades[index].id){
							ma.deleteActividad(actividad: actividad, receiver: self)
							//actividades.remove(at: index)
							/*DispatchQueue.main.async {
								self.actividadTableView.reloadData()
							}*/
							break
						}
					}
				}
				
			}else{
				DispatchQueue.main.async {
					self.actividadTableView.reloadData()
				}
			}
		}
	}
	
	//MARK: Actions
	@IBAction func btRefreshAction(_ sender: Any) {
		getAll()
	}
	
	@IBAction func btSearchAction(_ sender: Any) {
		showSearchBar = !showSearchBar
		sbFilter.isHidden = !showSearchBar
		
		filterSelection()
	}
	
	@IBAction func sbFilterAction(_ sender: Any) {
		selectedFilter = sbFilter.selectedSegmentIndex
		filterSelection()
	}
	
	@IBAction func datePickerAction(_ sender: Any) {
		//print(Utils.dateToString(date: datePicker.date))
		filteredActividades = []
		
		for actividad in actividades{
			if(Utils.dateToString(date: actividad.fecha) == Utils.dateToString(date: datePicker.date)){
				filteredActividades.append(actividad)
			}
		}
		lbCoincidenciasText(coincidencias: filteredActividades.count)
		//searchDateActive = !(filteredActividades.count == 0)
		actividadTableView.reloadData()
	}
	
	
	//MARK: Request Methods
	func getAll(){
		aiProgress.isHidden = false
		print("connecting to server")
		ma.selectAll(receiver: self)
	}

	//MARK: Data Receiver Methods
	func onDataReceived(data: [AnyObject]) {
		aiProgress.isHidden = true
		actividades = data as! [Actividad]
		actividades.sort(by: Actividad.sortByDate)
		DispatchQueue.main.async {
			self.actividadTableView.reloadData()
		}
	}
	
	func onMessageReceived(message: String, retry: Bool) {
		aiProgress.isHidden = true
		if(message == "ok"){
			self.present(Dialog.createAlert(title: "", message: "Los cambios se han aplicado correctamente", btText: "Aceptar", btAction: {}), animated: true, completion: nil)
			getAll()
		}else{
			if(retry){
				self.present(Dialog.createAlert(title: "ERROR", message: message, btText: "Reintentar", btAction: {self.getAll()}), animated: true, completion: nil)
			}else{
				self.present(Dialog.createAlert(title: "ERROR", message: message, btText: "Aceptar", btAction: {self.getAll()}), animated: true, completion: nil)
			}
		}
	}
	
	//MARK: My functions
	func filterSelection(){
		if(showSearchBar){
			lbCoincidencias.isHidden = false
			if(selectedFilter == PROFESOR){
				searchBar.isHidden = false
				datePicker.isHidden = true
				searchBar.text = ""
				searchActive = true
				searchDateActive = false
				self.searchBar(self.searchBar, textDidChange: "")
			}else if(selectedFilter == FECHA){
				searchBar.isHidden = true
				datePicker.isHidden = false
				searchActive = false
				datePicker.date = Date()
				searchDateActive = true
				self.datePickerAction(Any.self)
			}
		}else{
			searchBar.isHidden = true
			datePicker.isHidden = true
			lbCoincidencias.isHidden = true
			searchActive = false
			searchBar.text = ""
			searchDateActive = false
		}
		actividadTableView.reloadData()
	}
	
	func lbCoincidenciasText(coincidencias: Int){
		if(coincidencias == 0){
			lbCoincidencias.text = "No hay resultados"
		}else if(coincidencias == 1){
			lbCoincidencias.text = "1 resultado"
		}else{
			lbCoincidencias.text = "\(coincidencias) resultados"
		}
	}
}

