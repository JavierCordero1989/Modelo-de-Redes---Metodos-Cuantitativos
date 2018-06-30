//cola de prioridad
function Queue() {

    this.dataStore = Array.prototype.slice.call(arguments, 0);
    this.enqueue = enqueue;
    this.dequeue = dequeue;
    this.isEmpty = isEmpty;
    this.print = print;

    function enqueue(element) {
        this.dataStore.push(element);
    }

    function dequeue() {
        var priority = this.dataStore[0].priority;
        var priorizedItem = 0;
        this.dataStore.forEach(function(item, index) {
            if (item.priority < priority) {
                priority = item.priority;
                priorizedItem = index;
            }
        });
        return this.dataStore.splice(priorizedItem, 1)[0];
    }

    function isEmpty() {
        return this.dataStore.length == 0;
    }

    function print(element) {
        this.dataStore.map(function(patient) {
            element.appendChild(patient.node);
        });
    }
}