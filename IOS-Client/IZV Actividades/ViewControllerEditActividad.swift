//
//  ViewControllerEditActivity.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 14/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import UIKit

class ViewControllerEditActividad: UIViewController, UIPickerViewDataSource, UIImagePickerControllerDelegate, UINavigationControllerDelegate, UIPickerViewDelegate, DataReceiver{
	
	//MARK: Variables
	var actividad = Actividad()
	var showDpFecha = false
	var showHoraIni = false
	var showHoraFin = false
	var showPvProfesor = false
	var showPvGrupo = false
	
	var mp = ManagerProfesor()
	var mg = ManagerGrupo()
	var profesores = [Profesor]()
	var grupos = [Grupo]()
	
	let imagePicker = UIImagePickerController()
	
	//MARK: UI Variable
	@IBOutlet weak var btSave: UIBarButtonItem!
	@IBOutlet weak var tfTitulo: UITextField!
	@IBOutlet weak var tfLugar: UITextField!
	@IBOutlet weak var tvDescripcion: UITextView!
	@IBOutlet weak var btFecha: UIButton!
	@IBOutlet weak var btHoraInicio: UIButton!
	@IBOutlet weak var btHoraFin: UIButton!
	@IBOutlet weak var btProfesor: UIButton!
	@IBOutlet weak var btGrupo: UIButton!
	@IBOutlet weak var dpFecha: UIDatePicker!
	@IBOutlet weak var dpHora: UIDatePicker!
	@IBOutlet weak var pvProfesores: UIPickerView!
	@IBOutlet weak var pvGrupos: UIPickerView!
	@IBOutlet weak var btTrash: UIBarButtonItem!
	@IBOutlet weak var imagen: UIImageView!
	
	//MARK ViewController Methods
	override func viewDidLoad() {
		super.viewDidLoad()
		
		if(actividad.titulo == "" && actividad.lugar == ""){
			btSave.isEnabled = false
		}
		
		pvProfesores.dataSource = self;
		pvProfesores.delegate = self;
		pvGrupos.dataSource = self;
		pvGrupos.delegate = self;
		
		getAll()
		
		
		tfTitulo.text = actividad.titulo
		tfTitulo.addTarget(self, action: #selector(self.textFieldDidChange(_:)), for: UIControlEvents.editingChanged)
		tfTitulo.becomeFirstResponder()
		
		tfLugar.text = actividad.lugar
		tfLugar.addTarget(self, action: #selector(self.textFieldDidChange(_:)), for: UIControlEvents.editingChanged)
		
		tvDescripcion.text = actividad.descripcion
		
		btFecha.setTitle(setBtText(text: Utils.dateToString(date: actividad.fecha), selected: false), for: .normal)
		
		btHoraInicio.setTitle(setBtText(text: Utils.timeToString(date: actividad.horaInicio), selected: false), for: .normal)
		
		btHoraFin.setTitle(setBtText(text: Utils.timeToString(date: actividad.horaFin), selected: false), for: .normal)
		
		btProfesor.setTitle(setBtText(text: actividad.profesor?.nombre ?? "Selecciona un profesor", selected: false), for: .normal)
		
		btGrupo.setTitle(setBtText(text: actividad.grupo?.nombre ?? "Selecciona un grupo", selected: false), for: .normal)
		
		dpFecha.isHidden = true
		dpHora.isHidden = true
		pvProfesores.isHidden = true
		pvGrupos.isHidden = true
		
		btTrash.isEnabled = !(actividad.id == -1)
		
		imagePicker.delegate = self
		
		let tapGestureRecognizer = UITapGestureRecognizer(target: self, action: #selector(imageTapped(tapGestureRecognizer:)))
		imagen.isUserInteractionEnabled = true
		imagen.addGestureRecognizer(tapGestureRecognizer)
		
		if(actividad.id != -1){
			imagen.image = actividad.imagen
		}
	}
	
	//MARK: Navigation
	override func prepare(for segue: UIStoryboardSegue, sender: Any?) {
		super.prepare(for: segue, sender: sender)
		
		guard let button = sender as? UIBarButtonItem, (button === btSave  || button === btTrash) else{
			print("The save button was not pressed, cancelling")
			return
		}
		
		actividad.titulo = tfTitulo.text!
		actividad.lugar = tfLugar.text!
		actividad.descripcion = tvDescripcion.text!
		if(actividad.profesor == nil){
			actividad.profesor = profesores[0]
		}
		if(actividad.grupo == nil){
			actividad.grupo = grupos[0]
		}
		actividad.imagen = imagen.image
		/*actividad.profesor = profesores[pvProfesores.selectedRow(inComponent: 0)]
		actividad.grupo = grupos[pvGrupos.selectedRow(inComponent: 0)]
		actividad.fecha = dpFecha.date
		actividad.horaInicio = hIni
		actividad.horaFin = hFin
		print("Returning: \(actividad)")*/
	}
	
	//MARK: Picker View Data Source
	func numberOfComponents(in pickerView: UIPickerView) -> Int {
		return 1
	}
	
	func pickerView(_ pickerView: UIPickerView, numberOfRowsInComponent component: Int) -> Int {
		if(pickerView === pvProfesores){
			return profesores.count
		}else if(pickerView === pvGrupos){
			return grupos.count
		}else{
			return 0;
		}
	}
	
	func pickerView(_ pickerView: UIPickerView, titleForRow row: Int, forComponent component: Int) -> String? {
		if(pickerView === pvProfesores){
			return profesores[row].nombre
		}else if(pickerView === pvGrupos){
			return grupos[row].nombre
		}else{
			return ""
		}
	}
	
	func pickerView(_ pickerView: UIPickerView, didSelectRow row: Int, inComponent component: Int) {
		if(pickerView === pvProfesores){
			actividad.profesor = profesores[pvProfesores.selectedRow(inComponent: 0)]
			btProfesor.setTitle(setBtText(text: actividad.profesor?.nombre ?? "Selecciona un profesor", selected: true), for: .normal)
		}else if(pickerView === pvGrupos){
			actividad.grupo = grupos[pvGrupos.selectedRow(inComponent: 0)]
			btGrupo.setTitle(setBtText(text: actividad.grupo?.nombre ?? "Selecciona un grupo", selected: true), for: .normal)
		}
		
		if(tfTitulo.text != "" && tfLugar.text != "" && actividad.profesor != nil && actividad.grupo != nil){
			btSave.isEnabled = true
		}else{
			btSave.isEnabled = false
		}
	}
	
	//MARK: ImagePicker Methods
	func imagePickerController(_ picker: UIImagePickerController, didFinishPickingMediaWithInfo info: [String : Any]) {
		self.dismiss(animated: true, completion: nil)
		if let pickedImage = info[UIImagePickerControllerOriginalImage] as? UIImage{
			imagen.contentMode = .scaleAspectFit
			imagen.image = pickedImage
		}
	}
	
	func imagePickerControllerDidCancel(_ picker: UIImagePickerController) {
		self.dismiss(animated: true, completion: nil)
	}
	
	//MARK: Events
	@IBAction func btFechaAction(_ sender: Any) {
		managePickers(fecha: !showDpFecha, horaIni: false, horaFin: false, profesores: false, grupos: false)
		
		if(showDpFecha){
			dpFecha.date = actividad.fecha
		}else{
			actividad.fecha = dpFecha.date
		}
		
		updateBtText()
	}
	
	@IBAction func btHoraInicioAction(_ sender: Any) {
		managePickers(fecha: false, horaIni: !showHoraIni, horaFin: false, profesores: false, grupos: false)
		
		if(showHoraIni){
			dpHora.date = actividad.horaInicio
		}else{
			actividad.horaInicio = dpHora.date
		}
		//hIni = dpHora.date
		updateBtText()
	}
	
	@IBAction func btHoraFinAction(_ sender: Any) {
		managePickers(fecha: false, horaIni: false, horaFin: !showHoraFin, profesores: false, grupos: false)
		
		if(showHoraFin){
			dpHora.date = actividad.horaFin
		}else{
			actividad.horaFin = dpHora.date
		}
		//hFin = dpHora.date
		updateBtText()
	}
	
	@IBAction func btProfesorAction(_ sender: Any) {
		managePickers(fecha: false, horaIni: false, horaFin: false, profesores: !showPvProfesor, grupos: false)
		
		if(showPvProfesor && actividad.profesor != nil){
			for index in 0...profesores.count{
				if(profesores[index].id == actividad.profesor?.id){
					pvProfesores.selectRow(index, inComponent: 0, animated: true)
					break
				}
			}
		}else{
			actividad.profesor = profesores[pvProfesores.selectedRow(inComponent: 0)]
		}
		
		updateBtText()
		
		if(tfTitulo.text != "" && tfLugar.text != "" && actividad.profesor != nil && actividad.grupo != nil){
			btSave.isEnabled = true
		}else{
			btSave.isEnabled = false
		}
	}
	
	@IBAction func btGrupoAction(_ sender: Any) {
		managePickers(fecha: false, horaIni: false, horaFin: false, profesores:false, grupos: !showPvGrupo)
		
		if(showPvGrupo && actividad.grupo != nil){
			for index in 0...grupos.count{
				if(grupos[index].id == actividad.grupo?.id){
					pvGrupos.selectRow(index, inComponent: 0, animated: true)
					break
				}
			}
		}else{
			actividad.grupo = grupos[pvGrupos.selectedRow(inComponent: 0)]
			print(actividad.grupo!)
		}
		
		updateBtText()
		
		if(tfTitulo.text != "" && tfLugar.text != "" && actividad.profesor != nil && actividad.grupo != nil){
			btSave.isEnabled = true
		}else{
			btSave.isEnabled = false
		}
	}
	
	@IBAction func dpFechaAction(_ sender: Any) {
		actividad.fecha = dpFecha.date
		updateBtText()
	}
	
	@IBAction func dpHoraAction(_ sender: Any) {
		if(showHoraIni){
			actividad.horaInicio = dpHora.date
		}else if(showHoraFin){
			actividad.horaFin = dpHora.date
		}
		updateBtText()
	}
	
	
	func textFieldDidChange(_ textField: UITextField){
		if(tfTitulo.text != "" && tfLugar.text != "" && actividad.profesor != nil && actividad.grupo != nil){
			btSave.isEnabled = true
		}else{
			btSave.isEnabled = false
		}
		
		checkMaxLength(textField: textField, maxLength: 30)
	}
	
	func imageTapped(tapGestureRecognizer: UITapGestureRecognizer){
		imagePicker.allowsEditing = false
		imagePicker.sourceType = .photoLibrary
		
		present(imagePicker, animated: true, completion: nil)
	}
	
	
	//MARK: Data Receiver Methods
	func onDataReceived(data: [AnyObject]) {
		guard let p = data as? [Profesor] else{
			grupos = (data as? [Grupo])!
			//print(grupos)
			pvGrupos.reloadAllComponents()
			return
		}
		profesores = p
		//print(profesores)
		pvProfesores.reloadAllComponents()
	}
	
	func onMessageReceived(message: String, retry: Bool) {
		
	}
	
	//MARK: Methods
	func getAll(){
		print("connecting to server")
		getProfesores()
		getGrupos()
	}
	
	func getProfesores(){
		mp.selectAll(receiver: self)
	}
	
	func getGrupos(){
		mg.selectAll(receiver: self)
	}
	
	
	func managePickers(fecha: Bool, horaIni: Bool, horaFin: Bool, profesores: Bool, grupos: Bool){
		showDpFecha = fecha
		showHoraIni = horaIni
		showHoraFin = horaFin
		showPvProfesor = profesores
		showPvGrupo = grupos
		
		if(showDpFecha){
			self.dpFecha.isHidden = false
			UIView.animate(withDuration: 0.5, delay: 0, animations: {
				self.dpFecha.alpha = 1
				self.dpFecha.frame.size.height = 216
			}, completion: {finished in
				self.dpFecha.isHidden = false
			})
		}else{
			UIView.animate(withDuration: 0.5, delay: 0, animations: {
				self.dpFecha.alpha = 0
				self.dpFecha.frame.size.height = 0
			}, completion: {finished in
				self.dpFecha.isHidden = true
			})
		}
		
		if(showHoraIni || showHoraFin){
			self.dpHora.isHidden = false
			UIView.animate(withDuration: 0.5, delay: 0, animations: {
				self.dpHora.alpha = 1
				self.dpHora.frame.size.height = 216
			}, completion: {finished in
				self.dpHora.isHidden = false
			})
		}else{
			UIView.animate(withDuration: 0.5, delay: 0, animations: {
				self.dpHora.alpha = 0
				self.dpHora.frame.size.height = 0
			}, completion: {finished in
				self.dpHora.isHidden = true
			})
		}
		
		if(showPvProfesor){
			self.pvProfesores.isHidden = false
			UIView.animate(withDuration: 0.5, delay: 0, animations: {
				self.pvProfesores.alpha = 1
				self.pvProfesores.frame.size.height = 216
			}, completion: {finished in
				self.pvProfesores.isHidden = false
			})
		}else{
			UIView.animate(withDuration: 0.5, delay: 0, animations: {
				self.pvProfesores.alpha = 0
				self.pvProfesores.frame.size.height = 0
			}, completion: {finished in
				self.pvProfesores.isHidden = true
			})
		}
		
		if(showPvGrupo){
			self.pvGrupos.isHidden = false
			UIView.animate(withDuration: 0.5, delay: 0, animations: {
				self.pvGrupos.alpha = 1
				self.pvGrupos.frame.size.height = 216
			}, completion: {finished in
				self.pvGrupos.isHidden = false
			})
		}else{
			UIView.animate(withDuration: 0.5, delay: 0, animations: {
				self.pvGrupos.alpha = 0
				self.pvGrupos.frame.size.height = 0
			}, completion: {finished in
				self.pvGrupos.isHidden = true
			})
		}
	}
	
	func updateBtText(){
		var text = setBtText(text: Utils.dateToString(date: actividad.fecha), selected: showDpFecha)
		btFecha.setTitle(text, for: .normal)
		
		text = setBtText(text: Utils.timeToString(date: actividad.horaInicio), selected: showHoraIni)
		btHoraInicio.setTitle(text, for: .normal)
		
		text = setBtText(text: Utils.timeToString(date: actividad.horaFin), selected: showHoraFin)
		btHoraFin.setTitle(text, for: .normal)
		
		text = setBtText(text: actividad.profesor?.nombre ?? "Selecciona un profesor", selected: showPvProfesor)
		btProfesor.setTitle(text, for: .normal)
		
		text = setBtText(text: actividad.grupo?.nombre ?? "Selecciona un grupo", selected: showPvGrupo)
		btGrupo.setTitle(text, for: .normal)
	}
	
	func setBtText(text: String, selected: Bool) -> String{
		var t = text
		if(selected){
			t += " ▲"
		}else{
			t += " ▼"
		}
		return t
	}
	
	func checkMaxLength(textField: UITextField, maxLength: Int){
		if(textField.text!.characters.count > maxLength){
			textField.deleteBackward()
		}
	}
	
}
