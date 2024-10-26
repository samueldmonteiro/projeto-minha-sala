import styled from 'styled-components'

export const NavLinks = styled.div`
    display: flex;
    flex-direction:column;
    align-items: center;

    svg {
        display: inline-block;
        margin-right:6px;
        font-size:19px;
    }

    @media (max-width: 600px){
        li {
            margin-top: 0; /* Sem margem para o primeiro item */
        }

        li:not(:first-child) {
            margin-top: -8px; /* Adiciona margem ao restante dos itens */
        }
    }
`