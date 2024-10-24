// GlobalStyles.js
import { createGlobalStyle } from 'styled-components';

export const colors = {
    primary: '#3F51B5', // Definir cor principal (azul)
    secondary: '#FFEB3B', // Definir cor secundária (verde)
    danger: '#e74c3c', // Definir cor de perigo (vermelho)
    // Adicione mais cores conforme necessário
}

const GlobalStyles = createGlobalStyle`

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    
    body {
        font-family: "Poppins", serif !important;
        background-color: #f9f9f9;
        color: #333;
    }
    

    a {
        color:white;
        text-decoration:none;
    }
`;

export default GlobalStyles;


