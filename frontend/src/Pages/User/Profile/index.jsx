import { PageContainer } from '../../../globals/styles';
import useAuth from '../../../Hooks/useAuth';

const Profile = () => {

    const {user} = useAuth();

    console.log(user);

    return (
        <PageContainer>
oi
        </PageContainer>
    )
}

export default Profile;