function DomManipulation(element='') {

    this.element

    this.createElement = function () {
        this.element = document.createElement(element)
        return this
    }

    this.setClass = function (className) {
        this.element.classList.add(className)
        return this
    }

    this.removeClass = function (className) {
        this.element.classList.remove(className)
        return this
    }

    this.setText = function (text) {
        this.element.innerHTML = text
        return this
    }

    this.appendDataByClassName = function (className) {
        document.querySelector(`.${className}`).append(this.element)
        return this
    }

    this.getDataById = function (id) {
        this.element = document.getElementById(id)
        return this
    }
}