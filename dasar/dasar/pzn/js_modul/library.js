export {sayHello,mobil,name}

function sayHello(name) {
  console.info(`hello ${name}`);
}

 class mobil {
  _merek
  _jenis
  constructor(_merek,_jenis){
    this._merek = _merek
    this._jenis = _jenis
  }

  say(){
    console.info(`mobil mu ya ${this._merek}`)
  }
}
 const name = "budi"


