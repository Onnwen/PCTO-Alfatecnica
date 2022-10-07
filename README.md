# AlfaTecnica
Realizzazione di uno script per l'aggiunta di estintori su una planimetria

# Framework
[Konvajs](https://konvajs.org/)

# Richiesta da parte del cliente
Realizzare uno script che al click del bottone "_aggiungi estintore_" inserisca in una specifica posizione del **canvas** l'immagine dell'estintore;<br>
esso, inoltre, dovrà avere una posizione assoluta ... ovvero se io ingrandisco l'immagine della planimetria gli estintori dovranno rimanere nella loro posizione nella quale sono stati inseriti.<br><br>
**FUNZIONALITÀ AGGIUNTIVA**: <br>
Se io clicco col mouse su un estintore, esso mi deve reindirizzare alla pagina delle caratteristiche dell'estintore.

# Richieste svolte:
- [x] Realizzazione di uno script che al doppio click su una planimetria aggiunga un prodotto (scelto da un menù a tendina);
- [x] Realizzazione della visualizzazione dinamica delle planimetrie con i rispettivi prodotti; 
- [x] Realizzazione di un pulsante che stampa un pdf della planimetria con i prodotti ;
- [x] Realizzazione dei bottoni che evidenziano i prodotti della categoria cliccata;
- [ ] Realizzazione della barra di ricerca per i prodotti;
- [ ] Realizzazione dei pop-up dei prodotti (Lavoro ancora in corso).
- [x] Aggiornamento del DataBase;

# Funzioni aggiuntive svolte:
- [x] Menu a tendina che appare al click del tasto destro del mouse (le azioni che appaiono sono: _Visualizza_, _Modifica_ ed _Elimina_);
- [ ] Funzione che stampa il PDF della planimetria con i prodotti (sono stati trovati degli errori); 
- [x] Per spostarsi all'interno dell'immagine ora si può tenere premuto col dito o con il tasto destro del mouse e trascinare;
- [x] Controllo delle varie eccezioni;

# PRENDERE SPUNTO
[Canvas relative position on zooming](https://konvajs.org/docs/sandbox/Zooming_Relative_To_Pointer.html)<br>
[Context Menu on Mouse R click](https://konvajs.org/docs/sandbox/Canvas_Context_Menu.html)<br>
[Relative position on the canvas](https://konvajs.org/docs/sandbox/Relative_Pointer_Position.html)<br>
[Save the canvas as a PDF (jsPDF library)](https://konvajs.org/docs/sandbox/Canvas_to_PDF.html#Do-you-want-to-save-Konva-stage-into-a-PDF-file)
