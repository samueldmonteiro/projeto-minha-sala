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

export const NavLinks = styled.div`

    button {
        margin-left: 20px;
    }

    svg{
        display: inline-block;
        position: relative;
        top:4px;
        margin-right:4px;
        font-size: 18px;
    } 
`

export const MenuUserLinks = styled.div`
    a {
        color: #333 !important;
    }
`