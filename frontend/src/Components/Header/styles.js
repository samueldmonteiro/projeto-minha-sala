import styled from 'styled-components'

export const HeaderContainer = styled.div`
    width: 900px;
    margin:0 auto;

    @media (max-width: 950px){
        width: 100%;     
    }

    @media (max-width: 600px){
        width: auto;
        margin: 0;
    }
`

export const Logo = styled.img`
    width:60px;
    position:relative;
    padding: 5px 0px;
    top:5px;
`

export const UserAvatar = styled.div`
    margin-left:auto;

    @media (min-width: 600px){
        display:none;
    }
`

export const MobileLinks = styled.div`
    @media (max-width: 600px){
        a {
            color: #333 !important;
        }
    }  
`

export const MenuUserLinks = styled.div`
    a {
        color: #333 !important;
    }
`