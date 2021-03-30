var multiSelect = function(optionsElement, emit) {
   return {
     options: [],
     selected: [],
     show: false,
     open() { this.show = true },
     close() { this.show = false },
     isOpen() { return this.show === true },
     select(index, event) {

       if (!this.options[index].selected) {

         this.options[index].selected = true;
         this.options[index].element = event.target;
         this.selected.push(index);

     } else {
         this.selected.splice(this.selected.lastIndexOf(index), 1);
         this.options[index].selected = false
     }
     window.livewire.emit(emit, this.selected);
 },
 remove(index, option) {
  this.options[option].selected = false;
  this.selected.splice(index, 1);
},
loadOptions() {
  const options = document.getElementById(optionsElement).options;
  for (let i = 0; i < options.length; i++) {
    this.options.push({
      value: options[i].value,
      text: options[i].innerText,
      selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
  });
}
},
selectedValues(){
 return this.selected.map((option)=>{
   return this.options[option].value;
})
},
selectAll(){
 const options = document.getElementById(optionsElement).options;
 for (let i = 0; i < options.length; i++) {

   if(this.options[i].selected){
     continue;
 }
 this.options[i].selected = true;
                  //this.options[index].element = event.target;
                  this.selected.push(i);
              }
              window.livewire.emit(emit, this.selected);
          },
removeAll(){
             const options = document.getElementById(optionsElement).options;
             for (let i = 0; i < options.length; i++) {
               this.options[i].selected = false;

           }
           this.selected = [];
           window.livewire.emit(emit, this.selected);
       }
   }
}