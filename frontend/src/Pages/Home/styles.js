import styled from 'styled-components'
import { Pallete } from '../../globals/GlobalStyles'

export const ClassInformationContainer = styled.div`
    text-align: center;

    @media (max-width: 600px) {
        margin-top:105px;
    }
`

export const Time = styled.div`
    font-weight:bold;
    font-size:2.8em;
    margin-top: -30px;    

    @media (max-width:600px) {
        font-size:2.6em;
    }
`

export const Date = styled.div`
    font-weight:550;

`

export const Room = styled.div`
    font-weight:800;
    margin-top:50px;
    font-size:2.8em;

    span {
        color: ${Pallete.primary};
    }

    @media (max-width:600px) {
        font-size:2.6em;
    }
`

export const Subject = styled.div`

`


export const ClassInformationBlock = styled.div`

`

export const PaginationControl = styled.div`
    display: flex;
    justify-content: center;
    margin: 50px 0 20px 0;
`


export const MoreInformations = styled.div`
`

export const MoreInformationsItem = styled.div`
    max-width: 450px;
    margin: 0 auto;
    margin-bottom: 75px;

    @media (max-width:600px) {
        font-size:2.3em;
        max-width: 275px;

    }

`


