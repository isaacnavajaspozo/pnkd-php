class IndexedDBManager {
    constructor(config) {
        // Cargamos configuracion
        this.Database = config.Database;
        this.Version = config.Version;
        this.Stores = config.Stores;

        // Recurso de la base de datos
        this.db = null;
    }

    openDatabase() {
        return new Promise((resolve, reject) => {
            if (this.db !== null) {
                console.log('[IndexedDB]: La base de datos, ya está abierta.');
                resolve(this.db);
            }
            console.log('[IndexedDB]: Cargando DB ' + this.Database);
            const request = indexedDB.open(this.Database, this.Version);

            request.onerror = function (event) {
                reject('[IndexedDB]: Error al abrir la base de datos: ' + event.target.errorCode);
            };

            request.onsuccess = function (event) {
                this.db = event.target.result;
                console.log("[IndexedDB]: Base de datos cargada");
                resolve(this.db);
            }.bind(this);

            request.onupgradeneeded = function (event) {
                this.db = event.target.result;
                // Si no existe o a cambiado de version, creamos almacenes
                console.log('[IndexedDB]: Es necesario crear la base de datos');
                this.Stores.forEach(s => {
                    console.log(`[IndexedDB]: Creando almacen ${s.Name}`);
                    this.db.createObjectStore(s.Name, {
                        keyPath: s.Key,
                        autoIncrement: s.AutoIncrement
                    });
                });

            }.bind(this);
        });
    }


    getItem(key, storeName) {
        return new Promise((resolve, reject) => {
            if (this.db === null) {
                reject('[IndexedDB]: Error: La base de datos no está abierta.');
            }

            // Abrir la base de datos
            this.openDatabase()
                .then(() => {
                    // Abrir una transacción de lectura en el almacén de objetos
                    const transaction = this.db.transaction(storeName, 'readonly');
                    const store = transaction.objectStore(storeName);

                    // Llamar al método get para obtener el objeto con la clave primaria proporcionada
                    const request = store.get(key);

                    request.onerror = function (event) {
                        reject('[IndexedDB]: Error al obtener datos de IndexedDB: ' + event.target.errorCode);
                    };

                    request.onsuccess = function (event) {
                        resolve(event.target.result);
                    };
                })
                .catch(error => {
                    reject('[IndexedDB]: Error al abrir la base de datos: ' + error);
                });
        });
    }

    getAll(storeName) {
        return new Promise((resolve, reject) => {
            if (this.db === null) {
                reject('[IndexedDB]: Error: La base de datos no está abierta.');
            }

            const transaction = this.db.transaction(storeName, 'readonly');
            const store = transaction.objectStore(storeName);
            const request = store.getAll();

            request.onerror = function (event) {
                reject('[IndexedDB]: Error al obtener datos de IndexedDB: ' + event.target.errorCode);
            };

            request.onsuccess = function (event) {
                resolve(event.target.result);
            };
        });
    }

    addItem(data, storeName) {
        return new Promise((resolve, reject) => {
            if (this.db == null) {
                reject('[IndexedDB]: Error, la base de datos no está abierta.');
            }

            const transaction = this.db.transaction(storeName, 'readwrite');
            const store = transaction.objectStore(storeName);
            const request = store.add(data);

            request.onerror = function (event) {
                reject(`[IndexedDB]: Error al agregar dato en ${storeName}: ` + event.target.errorCode);
            };

            request.onsuccess = function (event) {
                resolve('[IndexedDB]: Dato guardado correctamente');
            };
        });
    }

    update(data, storeName) {
        return new Promise((resolve, reject) => {
            if (this.db == null) {
                reject('[IndexedDB]: Error, la base de datos no está abierta.');
            }

            const transaction = this.db.transaction(storeName, 'readwrite');
            const store = transaction.objectStore(storeName);
            const request = store.put(data);

            request.onerror = function (event) {
                reject(`[IndexedDB]: Error al agregar dato en ${storeName}: ` + event.target.errorCode);
            };

            request.onsuccess = function (event) {
                resolve('[IndexedDB]: Dato guardado correctamente');
            };
        });
    }

    delete(key, storeName) {
        return new Promise((resolve, reject) => {
            if (this.db == null) {
                reject('[IndexedDB]: Error, la base de datos no está abierta.');
            }

            // Abre una transacción de escritura en el almacén de objetos
            const transaction = this.db.transaction(storeName, 'readwrite');
            const store = transaction.objectStore(storeName);

            // Llama al método delete para eliminar el objeto con la clave primaria proporcionada
            const request = store.delete(key);

            request.onsuccess = function (event) {
                resolve('[IndexedDB]: Objeto eliminado correctamente');
            };

            request.onerror = function (event) {
                reject(`[IndexedDB]: Error al eliminar objeto: ${event.target.errorCode}`);
            };
        });
    }

    deleteIndex(index, storeName) {
        return new Promise((resolve, reject) => {
            if (this.db == null) {
                reject('[IndexedDB]: Error, la base de datos no está abierta.');
            }

            // Abre una transacción de escritura en el almacén de objetos
            const transaction = this.db.transaction(storeName, 'readwrite');
            const store = transaction.objectStore(storeName);

            // Llama al método delete para eliminar el objeto con la clave primaria proporcionada
            const request = store.deleteIndex(index);

            request.onsuccess = function (event) {
                resolve('[IndexedDB]: Objeto eliminado correctamente');
            };

            request.onerror = function (event) {
                reject(`[IndexedDB]: Error al eliminar objeto: ${event.target.errorCode}`);
            };
        });
    }


    empty(storeName) {
        return new Promise((resolve, reject) => {
            if (this.db == null) {
                reject('[IndexedDB]: Error, la base de datos no está abierta.');
            }

            const transaction = this.db.transaction([storeName], 'readwrite');
            const store = transaction.objectStore(storeName);
            const request = store.clear(); // Borra todos los objetos del almacén

            request.onsuccess = function (event) {
                resolve('Almacen vaciado correctamente');
            };

            request.onerror = function (event) {
                reject('Error al vaciar el almacen: ' + event.target.errorCode);
            };
        });
    }

}