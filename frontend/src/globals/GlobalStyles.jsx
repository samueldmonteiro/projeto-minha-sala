// GlobalStyles.js
import { createGlobalStyle } from 'styled-components';

export const Pallete = {
    primary: '#ff583a',
    secondary: '#42a5f5',
    danger: '#e74c3c',
}

const GlobalStyles = createGlobalStyle`

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    
    body {
        font-family: "Poppins", serif !important;
        //background-color: #f9f9f9;
    }
    

    a {
        color:white;
        text-decoration:none;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px #121212 inset !important;
}
`;

export default GlobalStyles;


